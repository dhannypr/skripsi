<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Android extends CI_Controller {

  public function index(){
   
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | Home'
        ];
        
        if($this->session->userdata('meja')){
          $datameja['cekmeja'] = 0;
        }else{
          $datameja['cekmeja'] = 0;
        }

        $this->load->view('layout/header');
        $this->load->view('home');
        $this->load->view('layout/footer');
    
  }



  public function menu_utama($meja){
        $this->session->set_userdata('meja', $meja);

        $url = base_url('/api/main/menu');
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $datameja['datamenu'] = $getMenu['data'];
        $datameja['meja'] = $this->session->userdata('meja');


        if($this->session->userdata('meja')){
          $datameja['cekmeja'] = 1;
        }else{
          $datameja['cekmeja'] = 0;
        }

        $this->load->view('layout/header');
        $this->load->view('layout/sidebarandroid',$datameja);
        $this->load->view('layout/navbarandroid');
        $this->load->view('menuandroid',$datameja);
        $this->load->view('layout/footer');
     
  }

  



  public function create_cart($id){

        $url = base_url('/api/main/menu/id/'.$id);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $menu = $getMenu['data'];

        $dataCreate = [
          'idmenu' => $id,
          'name' => $menu[0]['name'],
          'user' => $this->session->userdata('username'),
          'price'  => $menu[0]['price'],
          'qty'  => 1,
          'subtotal'  => $menu[0]['price'] * 1,
          'meja' => $this->session->userdata('meja'),
        ];

        $url = base_url('/api/main/cart');
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );

        /* Set JSON data to POST */
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dataCreate);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $cart['datamenu'] = $getMenu['data'];

        
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Berhasil di tambahkan ke keranjang');
        window.location.href='".base_url('android/menu_utama/'.$this->session->userdata('meja'))."';
        </script>");
        return;

  }

  public function cart(){

        $url = base_url('/api/main/cart/'.$this->session->userdata('meja'));
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $menu['datamenu'] = $getMenu['data'];

        if($this->session->userdata('meja')){
          $datameja['cekmeja'] = 1;
        }else{
          $datameja['cekmeja'] = 0;
        }
        
        $this->load->view('layout/header');
        $this->load->view('layout/sidebarandroid',$datameja);
        $this->load->view('layout/navbarandroid');
        $this->load->view('keranjang',$menu);
        $this->load->view('layout/footer');
     
  }


  public function delete_cart($id){

        $url = base_url('/api/main/cart/id/'.$id);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);
        $deleteUser = json_decode($result,true);
        if($deleteUser['status'] == 200){
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('cart deleted!');
          window.location.href='".base_url('android/cart')."';
          </script>");
        }else{
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('Failed to delete');
          window.location.href='".base_url('android/cart')."';
          </script>");
        }

      
  }

  public function confirm(){
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | Cart'
        ];
        $url = base_url('/api/main/cart/'.$this->session->userdata('meja'));
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $menu['datamenu'] = $getMenu['data'];
        

        $dataCreate = [
          'tanggal' => date("Y-m-d"),     
          'nama' => $this->session->userdata('username'),
          'meja' => $this->session->userdata('meja'),
          'item'  => json_encode($menu['datamenu'])
        ];

        $url = base_url('/api/main/pesanan');
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );

        /* Set JSON data to POST */
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dataCreate);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $cart['datamenu'] = $getMenu['data'];

        
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Berhasil di pesan');
        window.location.href='".base_url('android/pesanan')."';
        </script>");
        return;
     
  }


  public function pesanan(){
    
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | Pesanan'
        ];
        $url = base_url('/api/main/pesananpribadi/'.$this->session->userdata('meja'));
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $menu['datamenu'] = $getMenu['data'];
        
        if($this->session->userdata('meja')){
          $datameja['cekmeja'] = 1;
        }else{
          $datameja['cekmeja'] = 0;
        }


        $this->load->view('layout/header',$data);
        $this->load->view('layout/sidebarandroid',$datameja);
        $this->load->view('layout/navbarandroid',$data);
        $this->load->view('pesananandroid',$menu);
        $this->load->view('layout/footer');
     
  }

}