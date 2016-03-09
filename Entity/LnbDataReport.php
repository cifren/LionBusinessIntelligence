<?php

namespace Earls\LionBiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * Earls\LionBiBundle\Entity\LnbDataReport
 *
 * @ORM\Table(name="lnb_data_report")
 * @ORM\Entity
 * 
 * @ExclusionPolicy("all")
 */
class LnbDataReport
{

    /**
     * @var integer $id
     *
     * @ORM\Column(type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Expose
     */
    protected $id;

    /**
     * @var string $displayName
     *
     * @ORM\Column(name="display_name", type="text", length=100)
     * @Expose
     */
    protected $displayName;

    /**
     * @var string $sqlStatement
     *
     * @ORM\Column(name="sqlStatement", type="text", nullable=true)
     * @Expose
     */
    protected $sqlStatement;

    /**
     * @var string $entityName
     *
     * @ORM\Column(name="entity_name", type="text", nullable=true)
     * @Expose
     */
    protected $entityName;

    /**
     * @var int $entityId
     *
     * @ORM\Column(name="entity_id", type="integer", nullable=true)
     * @Expose
     */
    protected $entityId;

    /**
     * @var LnbDataReportType $lnbDataReportType
     *
     * @ORM\ManyToOne(targetEntity="LnbDataReportType", inversedBy="lnbDataReport")
     * @ORM\JoinColumn(name="lnb_data_report_type_id", referencedColumnName="id")
     */
    protected $lnbDataReportType;

    /**
     * @var ArrayCollection $lnbReportConfigs
     *
     * @ORM\OneToMany(targetEntity="LnbReportConfig", mappedBy="lnbDataReport")
     */
    protected $lnbReportConfigs;

    public function getId()
    {
        return $this->id;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function getSqlStatement()
    {
        return $this->sqlStatement;
    }

    public function getEntityName()
    {
        return $this->entityName;
    }

    public function getEntityId()
    {
        return $this->entityId;
    }

    public function getLnbDataReportType()
    {
        return $this->lnbDataReportType;
    }

    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    public function setSqlStatement($sqlStatement)
    {
        $this->sqlStatement = $sqlStatement;
        return $this;
    }

    public function setEntityName($entityName)
    {
        $this->entityName = $entityName;
        return $this;
    }

    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;
        return $this;
    }

    public function setLnbDataReportType(LnbDataReportType $lnbDataReportType)
    {
        $this->lnbDataReportType = $lnbDataReportType;
        return $this;
    }

    public function getArray()
    {
        return array(
            'id' => $this->getId(),
            'displayName' => $this->getDisplayName(),
            'sqlStatement' => $this->getSqlStatement(),
            'lnbDataReportType' => $this->getLnbDataReportType()->getId()
        );
    }

}
