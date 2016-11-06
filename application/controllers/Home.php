<?php

/**
 * Created by PhpStorm.
 * User: Joao
 * Date: 04/11/2016
 * Time: 16:33
 */
class Home extends CI_Controller {



    public function index(){
        $this->load->model('CrudModel');
        $records = $this->CrudModel->getRecords();
        $this->load->view('home', ['records'=>$records]);
    }




    public function create(){

        $this->load->view('create');
    }
    public function save(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('customerName', 'Customer Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');


        if ($this->form_validation->run())
        {
            $data = $this->input->post();


            $this->load->model('CrudModel');
            if($this->CrudModel->saveRecord($data)){

                $this->session->set_flashdata('response','Record Saved Successfully');
            }
            else{
                $this->session->set_flashdata('response','Record Not  saved!');
            }

            return redirect('home');
        }
        else
        {
            $this->load->view('create');

        }
    }



    public function edit($record_id){

        $this->load->model('CrudModel');
        $record = $this->CrudModel->getAllRecords($record_id);
        $this->load->view('update', ['record'=>$record]);

    }

    public function update($record_id){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('customerName', 'Customer Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');


        if ($this->form_validation->run())
        {
            $data = $this->input->post();
            $this->load->model('CrudModel');
            if($this->CrudModel->updateRecords($record_id, $data)){
                $this->session->set_flashdata('response','Record Updated Successfully');
            }
            else{
                $this->session->set_flashdata('response','Record Not  saved!');
            }

            return redirect('home');
        }
        else
        {
            $this->load->view('update');

        }

    }

    public function delete($record_id){
        $this->load->model('CrudModel');
        if($this->CrudModel->deleteRecord($record_id)){
            $this->session->set_flashdata('response','Record Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('response','Failed to Delete Record!');

        }return redirect('home');
    }



}

?>