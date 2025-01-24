<?php

namespace App\Http\Controllers;

use App\Domain\InPost\Services\InPostServiceInterface;
use Illuminate\Http\Request;

class InPostController extends Controller
{
    private InPostServiceInterface $inPostService;

    public function __construct(InPostServiceInterface $inPostService)
    {
        $this->inPostService = $inPostService;
    }

    public function getLockers()
    {
        try {
            return response()->json($this->inPostService->getLockers());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function createShipment(Request $request)
    {
        try {
            return response()->json($this->inPostService->createShipment($request->all()));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
