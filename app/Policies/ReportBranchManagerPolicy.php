<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ReportBranchManager;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportBranchManagerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_report::branch::manager');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ReportBranchManager $reportBranchManager): bool
    {
        return $user->can('view_report::branch::manager');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_report::branch::manager');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ReportBranchManager $reportBranchManager): bool
    {
        return $user->can('update_report::branch::manager');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ReportBranchManager $reportBranchManager): bool
    {
        return $user->can('delete_report::branch::manager');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_report::branch::manager');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, ReportBranchManager $reportBranchManager): bool
    {
        return $user->can('force_delete_report::branch::manager');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_report::branch::manager');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, ReportBranchManager $reportBranchManager): bool
    {
        return $user->can('restore_report::branch::manager');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_report::branch::manager');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, ReportBranchManager $reportBranchManager): bool
    {
        return $user->can('replicate_report::branch::manager');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_report::branch::manager');
    }
}
