<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Viteweb\ArticleBundle\Calendar;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of CalendarView
 *
 * @author Administrateur
 */
class CalendarView {
    
    /**
     *
     * @var ContainerInterface
     */
    protected $_container;
    
    public function __construct(ContainerInterface $container){
	$this->_container=$container;
    }
    
    public function getCalendar(){
        return "Hello calendar";
    }
    
}
