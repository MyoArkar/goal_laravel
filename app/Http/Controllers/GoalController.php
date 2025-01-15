<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CreateGoalRequest;
use App\Http\Requests\UpdateGoalRequest;
use App\Models\Goal;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class GoalController extends BaseController
{
    public function index()
    {
        return $this->success(
            'Goals retrieved successfully.',
            Goal::all(),
            200
        );
    }

    public function store(CreateGoalRequest $request)
    {
        $goal = JWTAuth::user()->goals()->create($request->validated());
        return $this->success(
            'Goal created successfully.',
            $goal,
            201
        );
    }

    public function show(int $id)
    {
        $goal = Goal::with('user')->find($id);
        return $this->success(
            'Goal retrieved successfully.',
            $goal,
            200
        );
    }

    public function update(UpdateGoalRequest $request, int $id)
    {
        $goal = Goal::find($id);

        if (!$goal) {
            return $this->error(
                'Goal not found.',
                null,
                404
            );
        }

        if ($goal->user_id !== JWTAuth::user()->id) {
            return $this->error(
                'You are not authorized to update this goal.',
                null,
                403
            );
        }

        $goal->update($request->all());
        return $this->success(
            'Goal updated successfully.',
            $goal,
            200
        );
    }

    public function destroy(int $id)
    {
        $goal = Goal::find($id);

        if ($goal->user_id !== JWTAuth::user()->id) {
            return $this->error(
                'You are not authorized to delete this goal.',
                null,
                403
            );
        }

        $goal->delete();
        return $this->success(
            'Goal deleted successfully.',
            null,
            200
        );
    }
}
