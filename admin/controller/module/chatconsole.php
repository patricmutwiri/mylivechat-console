<?php
class ControllerModuleChatconsole extends Controller {
	private $error = array ();
	public function index() {
		$this->load->language ( 'module/chatconsole' );
		
		$this->document->setTitle ( $this->language->get ( 'heading_title' ) );
		
		$this->load->model ( 'setting/setting' );
		
		if (($this->request->server ['REQUEST_METHOD'] == 'POST') && $this->validate ()) {
			$this->model_setting_setting->editSetting ( 'chatconsole', $this->request->post );
			
			$this->session->data ['success'] = $this->language->get ( 'text_success' );
			
			$this->response->redirect ( $this->url->link ( 'extension/module', 'token=' . $this->session->data ['token'], 'SSL' ) );
		}
		
		$data ['heading_title'] = $this->language->get ( 'heading_title' );
		$data ['entry_code'] = $this->language->get('entry_code');
		$data ['entry_displaytype'] = $this->language->get('entry_displaytype');
		$data ['text_edit'] = $this->language->get ( 'text_edit' );
		$data ['text_enabled'] = $this->language->get ( 'text_enabled' );
		$data ['text_disabled'] = $this->language->get ( 'text_disabled' );
		
		$data ['entry_status'] = $this->language->get ( 'entry_status' );
		
		$data ['button_save'] = $this->language->get ( 'button_save' );
		$data ['button_cancel'] = $this->language->get ( 'button_cancel' );
		
		if (isset ( $this->error ['warning'] )) {
			$data ['error_warning'] = $this->error ['warning'];
		} else {
			$data ['error_warning'] = '';
		}
		
		$data ['breadcrumbs'] = array ();
		
		$data ['breadcrumbs'] [] = array (
				'text' => $this->language->get ( 'text_home' ),
				'href' => $this->url->link ( 'common/dashboard', 'token=' . $this->session->data ['token'], 'SSL' ) 
		);
		
		$data ['breadcrumbs'] [] = array (
				'text' => $this->language->get ( 'text_module' ),
				'href' => $this->url->link ( 'extension/module', 'token=' . $this->session->data ['token'], 'SSL' ) 
		);
		
		$data ['breadcrumbs'] [] = array (
				'text' => $this->language->get ( 'heading_title' ),
				'href' => $this->url->link ( 'module/chatconsole', 'token=' . $this->session->data ['token'], 'SSL' ) 
		);
		
		$data ['action'] = $this->url->link ( 'module/chatconsole', 'token=' . $this->session->data ['token'], 'SSL' );
		
		$data ['cancel'] = $this->url->link ( 'extension/module', 'token=' . $this->session->data ['token'], 'SSL' );
		
		if (isset ( $this->request->post ['chatconsole_status'] )) {
			$data ['chatconsole_status'] = $this->request->post ['chatconsole_status'];
		} else {
			$data ['chatconsole_status'] = $this->config->get ( 'chatconsole_status' );
		}
		if (isset ( $this->request->post ['chatconsole_code'] )) {
			$data ['chatconsole_code'] = $this->request->post ['chatconsole_code'];
		} else {
			$data ['chatconsole_code'] = $this->config->get ( 'chatconsole_code' );
		}
		if (isset ( $this->request->post ['chatconsole_displaytype'] )) {
			$data ['chatconsole_displaytype'] = $this->request->post ['chatconsole_displaytype'];
		} else {
			$data ['chatconsole_displaytype'] = $this->config->get ( 'chatconsole_displaytype' );
		}
		
		$data ['header'] = $this->load->controller ( 'common/header' );
		$data ['column_left'] = $this->load->controller ( 'common/column_left' );
		$data ['footer'] = $this->load->controller ( 'common/footer' );
		
		$this->response->setOutput ( $this->load->view ( 'module/chatconsole.tpl', $data ) );
	}
	protected function validate() {
		if (! $this->user->hasPermission ( 'modify', 'module/chatconsole' )) {
			$this->error ['warning'] = $this->language->get ( 'error_permission' );
		}
		
		return ! $this->error;
	}
}