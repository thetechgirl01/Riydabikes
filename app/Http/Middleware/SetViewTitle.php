<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Settings;

class SetViewTitle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Default title for pages where it's not explicitly set
        $defaultTitle = 'Dashboard';
        
        // Get current route name
        $routeName = $request->route() ? $request->route()->getName() : '';
        
        // Define titles based on route names
        $titles = [
            'admin.shipments' => 'Manage Shipments',
            'admin.shipments.create' => 'Create New Shipment',
            'admin.shipments.view' => 'Shipment Details',
            'admin.shipments.edit' => 'Edit Shipment',
            'admin.shipments.update-status' => 'Update Shipment Status',
            'admin.shipments.update-status-form' => 'Update Shipment Status',
            'admin.shipments.print' => 'Print Shipment Invoice',
        ];
        
        // Set the title view variable
        view()->share('title', $titles[$routeName] ?? $defaultTitle);
        
        // Also ensure settings are available in all views
        if (!view()->shared('settings')) {
            $settings = Settings::where('id', '1')->first();
            view()->share('settings', $settings);
        }
        
        return $next($request);
    }
}
