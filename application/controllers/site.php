 
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Site extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
                $this->load->library('wx_oauth');
        }
 
        public function index()
        {
                $addr = $this->wx_oauth->authorize_addr();
                echo anchor($addr, 'authorize!!!');
        }
 
        public function callback()
        {
                $code = $_GET['code'];
                $response = $this->wx_oauth->access_token($code);
                echo '<pre>';
                print_r($r = json_decode($response));
                echo '</pre>';
                echo anchor('site/refresh/'.$r->refresh_token, 'refresh'),'<br>';
                echo anchor('site/info/'.$r->access_token.'/'.$r->openid, 'user info'),'<br>';
                echo anchor('site/valid/'.$r->access_token.'/'.$r->openid, 'valid access');
 
        }
 
        public function refresh($refresh_token)
        {
                $response = $this->wx_oauth->refresh_token($refresh_token);
                echo '<pre>';
                print_r(json_decode($response));
                echo '</pre>';
        }
 
        public function info($access_token, $openid)
        {
                header("Content-type: text/html; charset=gbk"); 
                $response = $this->wx_oauth->userinfo($access_token, $openid);
                echo '<pre>';
                print_r(json_decode($response));
                echo '</pre>';
        }
        public function valid($access_token, $openid)
        {
                $response = $this->wx_oauth->valid($access_token, $openid);
                echo '<pre>';
                print_r(json_decode($response));
                echo '</pre>';
        }
}
 
/* End of file site.php */
/* Location: ./application/controllers/site.php */
 
 ?>