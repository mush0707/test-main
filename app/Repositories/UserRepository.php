<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserRepository
{
    // int $id can be changed UUid
    public function check(int $id): bool
    {
        return User::query()->where('id', $id)->exists();
    }

    public function attach(int $userId, int $rewardId): void
    {
        if (!$this->existCheck($userId)) {
            throw new \InvalidArgumentException('user not found', ResponseAlias::HTTP_NOT_FOUND);
        }
        if (DB::table('user_rewards')
            ->where('reward_id', $rewardId)
            ->where('user_id', $userId)->exists()) {
            throw new \InvalidArgumentException('reward already attached to this user', ResponseAlias::HTTP_CONFLICT);
        }
        DB::table('user_rewards')
            ->insert([
                'reward_id' => $rewardId,
                'user_id' => $userId
            ]);
    }

    public function detachReward(int $rewardId): void
    {
        DB::table('user_rewards')
            ->where('reward_id', $rewardId)
            ->delete();
    }

    private function existCheck(int $userId): bool
    {
        return User::query()->where('id', $userId)->exists();
    }
}
