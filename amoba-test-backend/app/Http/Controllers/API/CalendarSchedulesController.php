<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexCalendarSchedules;
use App\Reservation;
use App\Route;
use App\Service;
use Illuminate\Http\Request;

class CalendarSchedulesController extends Controller
{
    public function index(IndexCalendarSchedules $request) {
        $params = $request->validated();

        $query = Service::query();

        $reservationsQuery = Reservation::query();

        if ($request->has('start_day')) {
            $operator = '=';

            if ($request->has('end_day'))
                $operator = '>=';

            $query->where('timestamp', $operator, $params['start_day']);

            $reservationsQuery->where('reservation_start', $operator, $params['start_day']);
        }

        if ($request->has('end_day')) {
            $operator = '<=';

            $query->where('timestamp', $operator, $params['end_day']);

            $reservationsQuery->where('reservation_start', $operator, $params['end_day']);
        }

        if ($request->has('route_id'))
            $query->where('external_route_id', '-'.$params['route_id']);

        $services = $query->get();

        $externalRouteIds = $services->pluck('external_route_id')->all();

        $routes = Route::with('route_data')->whereIn('external_id', $externalRouteIds)->get();

        $reservations = $reservationsQuery->get();

        return [
            'services' => $services,
            'routes' => $routes,
            'reservations' => $reservations,
        ];
    }
}
