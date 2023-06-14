<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PedidoMod extends CI_Model {
	function lista_cliente($status)
	{	
		//pega valores do banco de dados
		$this->db->group_by('nomeCliente');
		$this->db->join('pedido','pedido.idpedido = historico.pedido_idpedido');
		$this->db->join('cliente','cliente.idcliente = pedido.cliente_idcliente');
		$this->db->join('item_pedido','item_pedido.pedido_idpedido = pedido.idpedido');
		$this->db->join('produto','produto.idproduto = item_pedido.produto_idproduto');
		$this->db->where(array('status_idstatus'=>$status));
		return $this->db->get('historico')->result();
	}
	function lista_item($idPedido)
	{
		//pega valores do banco de dados
		$this->db->join('pedido','pedido.idpedido = historico.pedido_idpedido');
		$this->db->join('item_pedido','item_pedido.pedido_idpedido = pedido.idpedido');
		$this->db->join('produto','produto.idproduto = item_pedido.produto_idproduto');
		$this->db->join('cliente','cliente.idcliente = pedido.cliente_idcliente');
		$this->db->where(array('idpedido'=>$idPedido));
		return $this->db->get('historico')->result();
	}
	function item_pedido($idItemPedido)
	{
		$this->db->where(array('iditem_pedido'=>$idItemPedido));
		$this->db->join('pedido','pedido.idpedido = historico.pedido_idpedido');
		$this->db->join('cliente','cliente.idcliente = pedido.cliente_idcliente');
		$this->db->join('item_pedido','item_pedido.pedido_idpedido = pedido.idpedido');
		$this->db->join('produto','produto.idproduto = item_pedido.produto_idproduto');
		return $this->db->get('historico')->row();
	}
	function endereco_pedido($idPedido)
	{
		$this->db->where(array('idpedido'=>$idPedido));
		return $this->db->get('pedido')->row();
	}
	function pedido($idPedido)
	{
		$this->db->where(array('idpedido'=>$idPedido));
		$this->db->join('pedido','pedido.idpedido = historico.pedido_idpedido');
		$this->db->join('cliente','cliente.idcliente = pedido.cliente_idcliente');
		$this->db->join('item_pedido','item_pedido.pedido_idpedido = pedido.idpedido');
		$this->db->join('produto','produto.idproduto = item_pedido.produto_idproduto');
		return $this->db->get('historico')->row();
	}
	function lista_pedido($idCliente,$status)
	{
		//pega valores do banco de dados
		$this->db->join('pedido','pedido.idpedido = historico.pedido_idpedido');
		$this->db->join('cliente','cliente.idcliente = pedido.cliente_idcliente');
		$this->db->where(array('idcliente'=>$idCliente,'status_idstatus'=>$status));
		return $this->db->get('historico')->result();
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */