<?php

namespace CanalTP\MethBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/*
 * CalendarController
 */
class CalendarController extends Controller
{
    public function viewAction($externalCoverageId, $externalRouteId, $externalStopPointId)
    {
        $calendarManager = $this->get('canal_tp_meth.calendar_manager');
        $calendarsData = $calendarManager->getCalendarsAndSchedules($externalCoverageId, $externalRouteId, $externalStopPointId);

        return $this->render(
            'CanalTPMethBundle:Calendar:view.html.twig',
            array(
                'calendars'     => $calendarsData->calendars,
                'current_route' => $externalRouteId,
            )
        );
    }
}