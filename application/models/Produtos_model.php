<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model
{
	public function setProduto($produto)
	{
        $resp = $this->db->insert('produto', $produto);
        return $resp;
	}

	public function setComentario($comentario)
	{
        $resp = $this->db->insert('comentario', $comentario);
	}

	public function getProdutos($param = ''){
		$filtro = '';

		if (isset($param)) {
			if ($param != '') {
				$filtro = " WHERE cod_produto = {$param}";
			}
		}

		$sql = "SELECT i_produto,
					   nome_produto,
					   altura_produto,
					   largura_produto,
					   profundidade_produto,
					   cod_produto,
					   imagem 
				FROM produto {$filtro}";

		$query = $this->db->query($sql);
        $resp = $query->result_array();
        $query->free_result();
        return $resp;
	}

	public function getComentarios($i_produto){

		$sql = "SELECT i_comentario,
					   comentario
				FROM comentario 
				WHERE Produto_i_produto = {$i_produto}";

		$query = $this->db->query($sql);
        $resp = $query->result_array();
        $query->free_result();
        return $resp;
	}

}

/* End of file agendamentos_model.php */
/* Location: ./application/models/agendamentos_model.php */