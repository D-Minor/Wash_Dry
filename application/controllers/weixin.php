<?php 
 
class Weixin extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
        }
           public function index()
           {
              if (isset($_GET['code'])){
                    $getcode=$_GET['code'];
                }else{
                    echo "NO CODE";
                }
              $MY_BASE_URL = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx42bb4b547f239685&secret=e1428a758766ab712e0106a32b943d4a&code=".$getcode."&grant_type=authorization_code";
              $ch = curl_init ();
              $url = $MY_BASE_URL;
              // 设置URL参数 
              curl_setopt ( $ch, CURLOPT_URL, $url );
              // 设置cURL允许执行的最长秒数
              curl_setopt ( $ch, CURLOPT_TIMEOUT, 5 );
              // 要求CURL返回数据
              curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
              // 执行请求
              $result = curl_exec ( $ch );
              // 获取http状态
              $http_code = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );
              if ($http_code != 200) {
                return array();
              }
              $jsondata = json_decode ( $result );
              curl_close ($ch);
              $access_token=$jsondata->{"access_token"};
              $openid=$jsondata->{"openid"};
              //----------------
              $MY_BASE_URL = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&&openid=".$openid;
              $ch = curl_init ();
              $url = $MY_BASE_URL;
              // 设置URL参数 
              curl_setopt ( $ch, CURLOPT_URL, $url );
              // 设置cURL允许执行的最长秒数
              curl_setopt ( $ch, CURLOPT_TIMEOUT, 5 );
              // 要求CURL返回数据
              curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
              // 执行请求
              $result = curl_exec ( $ch );
              // 获取http状态
              $http_code = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );
              if ($http_code != 200) {
                return array();
              }
              $jsondata = json_decode ( $result );
              $useropenid=$jsondata->{"openid"};
              $nickname=$jsondata->{"nickname"};
              $userhead=$jsondata->{"headimgurl"};
              $data['openid']=$useropenid;
              $data['nickname']=$nickname;
              $data['headimgurl']=$userhead;
              $this->load->view("minetest",$data);
           }
}

?>