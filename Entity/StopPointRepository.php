<?php

namespace CanalTP\MethBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * StopPointRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StopPointRepository extends EntityRepository
{
    public function updatePdfGenerationDate($lineId, $stopPointNavitiaId)
    {
        $stop_point = $this->findOneBy(array('line' => $lineId, 'navitiaId' => $stopPointNavitiaId));
        
        $stop_point->setPdfGenerationDate(new \DateTime());
        $this->getEntityManager()->persist($stop_point);
        $this->getEntityManager()->flush();
    }
}
