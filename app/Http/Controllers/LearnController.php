<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LearnController extends Controller
{
    private function materials(): array
    {
        return config('ccus.materials', []);
    }

    private function findMaterial(string $slug): ?array
    {
        foreach ($this->materials() as $material) {
            if ($material['slug'] === $slug) {
                return $material;
            }
        }

        return null;
    }

    private function progress(Request $request): array
    {
        return $request->session()->get('ccus_progress', []);
    }

    private function completedSlides(
        Request $request,
        string $slug
    ): int {
        $progress = $this->progress($request);

        return (int) ($progress[$slug] ?? 0);
    }

    private function isUnlocked(
        Request $request,
        array $material
    ): bool {
        if ($material['number'] === 1) {
            return true;
        }

        foreach ($this->materials() as $previous) {
            if ($previous['number'] === $material['number'] - 1) {
                $total = count($previous['slides']);

                return $this->completedSlides(
                    $request,
                    $previous['slug']
                ) >= $total;
            }
        }

        return false;
    }

    public function index(Request $request): View
    {
        $progress = $this->progress($request);
        $materials = [];

        foreach ($this->materials() as $material) {
            $total = count($material['slides']);

            $completed = min(
                (int) ($progress[$material['slug']] ?? 0),
                $total
            );

            $material['total_slides'] = $total;
            $material['completed_slides'] = $completed;

            $material['percentage'] = $total > 0
                ? (int) round(($completed / $total) * 100)
                : 0;

            $material['is_completed'] = $completed >= $total;
            $material['is_unlocked'] = $this->isUnlocked(
                $request,
                $material
            );

            $materials[] = $material;
        }

        $totalSlides = array_sum(
            array_column($materials, 'total_slides')
        );

        $completedTotal = array_sum(
            array_column($materials, 'completed_slides')
        );

        $overallProgress = $totalSlides > 0
            ? (int) round(($completedTotal / $totalSlides) * 100)
            : 0;

        return view('pages.learn.index', [
            'materials' => $materials,
            'overallProgress' => $overallProgress,
            'completedTotal' => $completedTotal,
            'totalSlides' => $totalSlides,
        ]);
    }

    public function show(
        Request $request,
        string $slug
    ): View|RedirectResponse {
        $material = $this->findMaterial($slug);

        abort_if(!$material, 404);

        if (!$this->isUnlocked($request, $material)) {
            return redirect()
                ->route('learn.index')
                ->with('locked_message', 'Selesaikan materi sebelumnya untuk membuka materi ini.');
        }

        $completed = $this->completedSlides(
            $request,
            $slug
        );

        $total = count($material['slides']);

        $completed = min($completed, $total);

        $currentSlide = $completed >= $total
            ? $total - 1
            : $completed;

        $percentage = $total > 0
            ? (int) round(($completed / $total) * 100)
            : 0;

        return view('pages.learn.show', [
            'material' => $material,
            'completedSlides' => $completed,
            'currentSlide' => $currentSlide,
            'totalSlides' => $total,
            'percentage' => $percentage,
        ]);
    }

    public function updateProgress(
        Request $request,
        string $slug
    ): JsonResponse {
        $material = $this->findMaterial($slug);

        abort_if(!$material, 404);

        if (!$this->isUnlocked($request, $material)) {
            return response()->json([
                'success' => false,
                'message' => 'Materi ini masih terkunci.',
            ], 403);
        }

        $validated = $request->validate([
            'slide' => ['required', 'integer', 'min:0'],
        ]);

        $slide = (int) $validated['slide'];
        $total = count($material['slides']);

        if ($slide >= $total) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor slide tidak valid.',
            ], 422);
        }

        $progress = $this->progress($request);

        $completed = min(
            (int) ($progress[$slug] ?? 0),
            $total
        );

        // Slide hanya boleh diselesaikan secara berurutan.
        if ($slide > $completed) {
            return response()->json([
                'success' => false,
                'message' => 'Selesaikan slide sebelumnya terlebih dahulu.',
            ], 422);
        }

        // Simpan slide yang baru diselesaikan.
        if ($slide === $completed) {
            $completed++;
        }

        $progress[$slug] = $completed;

        $request->session()->put('ccus_progress', $progress);

        return response()->json([
            'success' => true,
            'completed_slides' => $completed,
            'total_slides' => $total,
            'percentage' => (int) round(
                ($completed / $total) * 100
            ),
            'is_completed' => $completed >= $total,
            'message' => $completed >= $total
                ? 'Selamat! Kamu telah menyelesaikan materi ini.'
                : 'Progress berhasil disimpan.',
        ]);
    }
}

