<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $table = 'policies';

    protected $fillable = ['title', 'content', 'policy_type', 'is_active'];

    // This is a local scope
    public function scopeFilter($query, $filters)
    {
        return $query
            ->when($filters['policy_type'] ?? null, fn($q, $type) => $q->where('policy_type', $type))
            ->when(isset($filters['is_active']), fn($q) => $q->where('is_active', $filters['is_active']));
    }
}
