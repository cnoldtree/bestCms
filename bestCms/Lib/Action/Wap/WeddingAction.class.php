<?php
class WeddingAction extends BaseAction{
	public function index(){
		if(isset($_GET['id'])){
			$data['id']=$this->_get('id','intval');
			$data['token']=$this->_get('token');
		}else{
			exit('非法请求');
		}
		$wedding=D('Wedding');
		$weddingData=$wedding->where($data)->find();
		$photo=M('Photo_list')->field('id,picurl')->where(array('pid'=>$weddingData['pid']))->select();
		$this->assign('weddingData',$weddingData);
		$this->assign('photo',$photo);
		$this->display();
	}
	public function check(){
		if(isset($_GET['id'])){
			 if(IS_POST){
				$wedding=M('Wedding')->where(array('token'=>$this->_get('token'),'id'=>$this->_get('id','intval')))->find();
				if($wedding['passowrd']==$this->_post('pwd')){
					$data=array();
					$fid=$this->_get('id','intval');
					$type=$this->_get('type','intval');
					$count=M('Wedding_info')->where(array('fid'=>$fid,type=>$type))->count();
					$info=M('Wedding_info')->where(array('fid'=>$fid,type=>$type))->select();
					$this->assign('count',$count);
					$this->assign('wedding',$info);
					$this->assign('pic',$wedding);
					if($type==1){
						$this->display('info2');
					}else{
						$this->display('info1');
					}
				}else{
					exit('your request error');
				}
			}else{
				$this->display();
			}
		}else{
			exit('非法请求');
		}
		
	
		
	}
	public function info(){
		if(IS_POST){
			$wedding=D('wedding_info');
			$data['name']=$this->_post('name');
			$data['fid']=$this->_post('fid');
			$data['type']=$this->_post('type');
			$data['phone']=$this->_post('phone');
			$data['time']=time();
			if($data['type']==1){ 
				$data['num']=$this->_post('num');
			}else{
				$data['info']=$this->_post('info');
			}
			if($wedding->add($data)){
				echo '提交成功';
			
			}else{
				echo '提交失败';
			}
		}else{
			$this->error('非法操作');
		}
	}
}
?>

