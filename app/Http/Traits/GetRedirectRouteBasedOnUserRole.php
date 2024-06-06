<?php 
namespace App\Http\Traits;

use App\Models\User;

trait GetRedirectRouteBasedOnUserRole
{
    /**
     * Get the redirect route based on the user role.
     *
     * @param User $user
     * @return string
     */
    public function getRedirectRouteBasedOnUserRole(User $user): string
    {
        $redirectRoute = 'real-estate-agent.dashboard';

        if ($user->hasRole('Root')) {
            
            $redirectRoute = 'root.dashboard';
        
        } else if ($user->hasRole('Inspector')) {

            $redirectRoute = 'inspector.dashboard';

        }
        
        return $redirectRoute;
    }
}