<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

   public function index(){

  $this->load->view('layout/header');
  $this->load->view('layout/sidebar');
  $this->load->view('layout/navbar');
  $this->load->view('dashboard');
  $this->load->view('layout/footer');
    }
    public function list_user(){

      $url = base_url('/api/main/users');
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJ1c2VybmFtZSI6IndlZHkxMjMiLCJpYXQiOjE2MjIyNzM5ODIsImV4cCI6MTYyMjI5MTk4Mn0.YUsYay7fR8qzUgJJUHkr7ilr2SkXDWU9P8_Boa2g2iI'
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getUser = json_decode($result,true);
        $user['datauser'] = $getUser['data'];
        
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('user',$user);
        $this->load->view('layout/footer');
        }
        
        public function delete_user($id){
          $url = base_url('/api/main/users/id/'.$id);
                 $curl = curl_init($url);
                 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
             
                 curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                   'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJ1c2VybmFtZSI6IndlZHkxMjMiLCJpYXQiOjE2MjIyNzM5ODIsImV4cCI6MTYyMjI5MTk4Mn0.YUsYay7fR8qzUgJJUHkr7ilr2SkXDWU9P8_Boa2g2iI'
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
                   window.alert('User deleted!');
                   window.location.href='".base_url('dashboard/list_user')."';
                   </script>");
                 }else{
                   echo ("<script LANGUAGE='JavaScript'>
                   window.alert('Failed to delete');
                   window.location.href='".base_url('dashboard/list_user')."';
                   </script>");
                 }
         
         }


         public function list_order(){

          $url = base_url('/api/main/order');
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
              'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJ1c2VybmFtZSI6IndlZHkxMjMiLCJpYXQiOjE2MjIyNzM5ODIsImV4cCI6MTYyMjI5MTk4Mn0.YUsYay7fR8qzUgJJUHkr7ilr2SkXDWU9P8_Boa2g2iI'
              )
            );
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
            // Send the request
            $result = curl_exec($curl);
            // Free up the resources $curl is using
            curl_close($curl);
    
            $getOrder = json_decode($result,true);
            $order['dataorder'] = $getOrder['data'];
            
            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('layout/navbar');
            $this->load->view('order',$order);
            $this->load->view('layout/footer');
            }
            
            public function delete_order($id){
              $url = base_url('/api/main/order/id/'.$id);
                     $curl = curl_init($url);
                     curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                 
                     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                       'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJ1c2VybmFtZSI6IndlZHkxMjMiLCJpYXQiOjE2MjIyNzM5ODIsImV4cCI6MTYyMjI5MTk4Mn0.YUsYay7fR8qzUgJJUHkr7ilr2SkXDWU9P8_Boa2g2iI'
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
                       window.alert('User deleted!');
                       window.location.href='".base_url('dashboard/list_user')."';
                       </script>");
                     }else{
                       echo ("<script LANGUAGE='JavaScript'>
                       window.alert('Failed to delete');
                       window.location.href='".base_url('dashboard/list_user')."';
                       </script>");
                     }
             
             }

             public function list_menu(){

              $url = base_url('/api/main/menu');
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
            
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                  'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJ1c2VybmFtZSI6IndlZHkxMjMiLCJpYXQiOjE2MjIyNzM5ODIsImV4cCI6MTYyMjI5MTk4Mn0.YUsYay7fR8qzUgJJUHkr7ilr2SkXDWU9P8_Boa2g2iI'
                  )
                );
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
                // Send the request
                $result = curl_exec($curl);
                // Free up the resources $curl is using
                curl_close($curl);
        
                $getMenu = json_decode($result,true);
                $menu['datamenu'] = $getMenu['data'];
                
                $this->load->view('layout/header');
                $this->load->view('layout/sidebar');
                $this->load->view('layout/navbar');
                $this->load->view('menu',$menu);
                $this->load->view('layout/footer');
                }
                
                public function delete_menu($id){
                  $url = base_url('/api/main/menu/id/'.$id);
                         $curl = curl_init($url);
                         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                     
                         curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                           'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJ1c2VybmFtZSI6IndlZHkxMjMiLCJpYXQiOjE2MjIyNzM5ODIsImV4cCI6MTYyMjI5MTk4Mn0.YUsYay7fR8qzUgJJUHkr7ilr2SkXDWU9P8_Boa2g2iI'
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
                           window.alert('User deleted!');
                           window.location.href='".base_url('dashboard/list_user')."';
                           </script>");
                         }else{
                           echo ("<script LANGUAGE='JavaScript'>
                           window.alert('Failed to delete');
                           window.location.href='".base_url('dashboard/list_user')."';
                           </script>");
                         }
                 
                 }


                 public function list_meja(){

                  $url = base_url('/api/main/meja');
                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
                
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                      'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJ1c2VybmFtZSI6IndlZHkxMjMiLCJpYXQiOjE2MjIyNzM5ODIsImV4cCI6MTYyMjI5MTk4Mn0.YUsYay7fR8qzUgJJUHkr7ilr2SkXDWU9P8_Boa2g2iI'
                      )
                    );
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
                    // Send the request
                    $result = curl_exec($curl);
                    // Free up the resources $curl is using
                    curl_close($curl);
            
                    $getMeja = json_decode($result,true);
                    $meja['datameja'] = $getMeja['data'];
                    
                    $this->load->view('layout/header');
                    $this->load->view('layout/sidebar');
                    $this->load->view('layout/navbar');
                    $this->load->view('meja',$meja);
                    $this->load->view('layout/footer');
                    }
                    
                    public function delete_meja($id){
                      $url = base_url('/api/main/meja/id/'.$id);
                             $curl = curl_init($url);
                             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                         
                             curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                               'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJ1c2VybmFtZSI6IndlZHkxMjMiLCJpYXQiOjE2MjIyNzM5ODIsImV4cCI6MTYyMjI5MTk4Mn0.YUsYay7fR8qzUgJJUHkr7ilr2SkXDWU9P8_Boa2g2iI'
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
                               window.alert('User deleted!');
                               window.location.href='".base_url('dashboard/list_user')."';
                               </script>");
                             }else{
                               echo ("<script LANGUAGE='JavaScript'>
                               window.alert('Failed to delete');
                               window.location.href='".base_url('dashboard/list_user')."';
                               </script>");
                             }
                     
                     }
  }