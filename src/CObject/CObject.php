<?php
/**
 * Holding a instance of CMad to enable use of $this in subclasses and provide some helpers.
 *
 * @package MadCore
 */
class CObject {

    /**
     * Members
     */
    protected $ml;
    protected $config;
    protected $request;
    protected $data;
    protected $db;
    protected $views;
    protected $session;
    protected $user;


    /**
     * Constructor, can be instantiated by sending in the $ml reference.
     */
    protected function __construct($ml=null) {
      if(!$ml) {
        $ml = CMad::Instance();
      }
      $this->ml       = &$ml;
    $this->config   = &$ml->config;
    $this->request  = &$ml->request;
    $this->data     = &$ml->data;
    $this->db       = &$ml->db;
    $this->views    = &$ml->views;
    $this->session  = &$ml->session;
    $this->user     = &$ml->user;
    }


    /**
     * Wrapper for same method in CMad. See there for documentation.
     */
    protected function ShowErrorPage($code, $message=null) {
    $this->ml->ShowErrorPage($code, $message);
  }


    /**
     * Wrapper for same method in CMad. See there for documentation.
     */
    protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    $this->ml->RedirectTo($urlOrController, $method, $arguments);
  }


    /**
     * Wrapper for same method in CMad. See there for documentation.
     */
    protected function RedirectToController($method=null, $arguments=null) {
    $this->ml->RedirectToController($method, $arguments);
  }


    /**
     * Wrapper for same method in CMad. See there for documentation.
     */
    protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
    $this->ml->RedirectToControllerMethod($controller, $method, $arguments);
  }


    /**
     * Wrapper for same method in CMad. See there for documentation.
     */
  protected function AddMessage($type, $message, $alternative=null) {
    return $this->ml->AddMessage($type, $message, $alternative);
  }


    /**
     * Wrapper for same method in CMad. See there for documentation.
     */
    protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
    return $this->ml->CreateUrl($urlOrController, $method, $arguments);
  }


    /**
     * Wrapper for same method in CMad. See there for documentation.
     */
    protected function CreateUrlToController($method=null, $arguments=null) {
    return $this->ml->CreateUrlToController($method, $arguments);
  }


    /**
     * Wrapper for same method in CMad. See there for documentation.
     */
    protected function CreateBreadcrumb($options) {
    return $this->ml->CreateBreadcrumb($options);
  }


}