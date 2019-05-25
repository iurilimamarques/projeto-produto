<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller 
{

	public function index()
	{
		$this->load->view('home');
	}

	public function loadCadastroProdutos()
	{
		$this->load->view('produtos/cadastro_produtos');
	}

	public function loadProdutos()
	{	
		$this->load->view('produtos/produtos');
	}

	public function setProduto()
	{
		$this->load->model("Produtos_model");
		$cod_produto = $this->input->post('cod_produto');
		$nome_produto = $this->input->post('nome_produto');
		$altura_produto = $this->input->post('altura_produto');
		$largura_produto = $this->input->post('largura_produto');
		$profundidade_produto = $this->input->post('profundidade_produto');
  
		$temp = explode(".", $_FILES['file']['name']);
		$nome = md5($cod_produto);
		$dir = base_url().'imagens/'.$nome.'.'.$temp[1];

		$config['upload_path']          = BASEDIR_PROJETO.'imagens/';
    	$config['allowed_types']        = 'jpg|png';
    	$config['file_name']            =  $nome.'.'.$temp[1];
    	$config['max_size']             = 0;

    	if (!file_exists($config['upload_path'] ) && ! is_dir($config['upload_path'] )) {
            chmod ($config['upload_path'], 0777);
        }

    	$this->upload->initialize($config);

    	if ( ! $this->upload->do_upload('file'))
    	{
    		$error = array('error' => $this->upload->display_errors());
    		echo '<pre>';
    		print_r($error);
    		echo '</pre>';
    	
    	}else{
    		$resp = $this->Produtos_model->getProdutos($cod_produto);
    		
    		if ($resp == []) {
    			$data = array('upload_data' => $this->upload->data());

    			$data = ['cod_produto' => $cod_produto,
    			'nome_produto'	=> $nome_produto,
    			'altura_produto' => $altura_produto,
    			'largura_produto' => $largura_produto,
    			'profundidade_produto' => $profundidade_produto,
    			'imagem' => $dir];
    			
    			$resp = $this->Produtos_model->setProduto($data);
    			return $resp;
    		}
    		
    	}
	}

	public function getProdutos()
	{
		$this->load->model("Produtos_model");

		$resp = $this->Produtos_model->getProdutos();
		echo json_encode($resp);
	}

	public function setComentario()
	{
		$data = $this->getInputAngular();
		$this->load->model("Produtos_model");

		$this->Produtos_model->setComentario($data);
	}

	public function getComentarios()
	{
		$this->load->model("Produtos_model");
		$data = $this->getInputAngular();
		$resp = $this->Produtos_model->getComentarios($data['i_produto']);
		echo json_encode($resp);
	}

	public function getInputAngular()
    {
    	$postdata = file_get_contents("php://input");
    	$request = json_decode($postdata, true);

    	foreach ($request as $key => $value) {
    		$request[$key] = str_replace("'", '', $value);
    	}
    	return $request;
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */