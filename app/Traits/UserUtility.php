<?php

namespace App\Traits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

trait UserUtility
{
    private $session;
    function __construct(){
        $this->session = session();
    }
    /* public function loggerDtl() {
        return auth()->guard('webadmin')->user();
    }
    public function getLoggerId() : int {
        return auth()->guard('webadmin')->user()->id;
    }
    public function getLoggerRoleTypeId() : int {
        return auth()->guard('webadmin')->user()->user_type_id;
    }
    public function getLoggerRoleType() : string {
        return auth()->guard('webadmin')->user()->user_type;
    }
    public function getLoggerUserName() : string {
        return auth()->guard('webadmin')->user()->username;
    }
    public function getLoggerMobileNo() : int {
        return auth()->guard('webadmin')->user()->mobile_no;
    }
    public function getLoggerEmail() : string {
        return auth()->guard('webadmin')->user()->email;
    }
    public function getLoggerAddress() : string {
        return auth()->guard('webadmin')->user()->address;
    }
    public function getLoggerName() {
        return auth()->guard('webadmin')->user()->name;
    } */   

    public function loggerDtl() {
        return $this->session->get('loginData');
    }
    public function getLoggerId() : int {
        return $this->session->get('loginData.id');
    }
    public function getLoggerName() : string {
        return $this->session->get('loginData.name');
    }
    public function getLoggerEmail() : string {
        return $this->session->get('loginData.email');
    }
    public function getLoggerPhone() : string {
        return $this->session->get('loginData.phone');
    }
    public function getLoggerUserRole() : string {
        return $this->session->get('loginData.user_role');
    }
    public function getLoggerDesignation() : string {
        return $this->session->get('loginData.designation');
    }
    public function getLoggerDistrict() : string {
        return $this->session->get('loginData.district');
    }
    public function getLoggerBlock() : string {
        return $this->session->get('loginData.block');
    }
    
}
