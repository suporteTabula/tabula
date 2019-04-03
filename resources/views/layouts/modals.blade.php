<!--Exclusão-->
<div class="modal fade" id="confirmationModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Confirmação</h4>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja realizar esta exclusão?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="confirm">Confirmar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--/.Exclusão-->

<!--Produto Não Existe-->
<div class="modal fade" id="dontExist">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Produto</h4>
      </div>
      <div class="modal-body">
        <p>Produto/Lote não Loclizado ou já adicionado ao pedido!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Voltar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--/.Exclusão-->

<!--Edição Estoque-->
<div class="modal fade" id="editStock">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{route('admin.stock.update')}}">
        {{csrf_field()}}
        <div class="modal-header">
          <input type="hidden" name="id_stock" >
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Confirmação</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row" >
            <div class="col-sm-6">
              <label for="quantity">Quantidade</label>
              <input type="text" name="quantity" class="form-control" id="quantity">
            </div>
            <div class="col-sm-6">
              <label for="date_transaction">Data de Transação</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="date_transaction" class="form-control pull-right input-date">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="due_date">Data de Vencimento</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>                     
                  <input type="text" name="due_date" class="form-control pull-right input-date">
              </div>
              <div class="form-group">
                <input type="checkbox" id="no_due" name="no_due">
                <label for="no_due">Sem Vencimento</label>
              </div>
            </div>
            <div class="col-sm-6">
              <label for="type">Tipo de Transação</label>                  
              <select id="type" name="type" class="form-control">
                <option selected disabled>Selecione....</option>
                <option value="1">Entrada</option>
                <option value="2">Saída</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" >Atualizar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--/.Edição Estoque-->

<!--Incluir Item Lote-->
<div class="modal fade" id="productBatch">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{route('admin.stock.batch')}}">
        {{csrf_field()}}
        <div class="modal-header">
          <input type="hidden" name="id_batch">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Incluir Produto</h4>
        </div>
        <div class="box-body">
          <div class="form-group" >
            <div class="col-sm-6">
              <label for="bar_code">Código de Barras</label>
              <input type="text" name="bar_code" class="form-control" id="bar_code">
            </div>
            <div class="col-sm-6">
              <label for="name">Nome do produto</label>
              <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="brand">Marca</label>
              <input type="text" name="brand" class="form-control" id="brand" value="{{old('brand')}}">
            </div>
            <div class="col-sm-6">
              <label for="ncm">NCM</label>
              <input type="ncm" name="ncm" class="form-control" id="ncm" value="{{old('ncm')}}" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-3">
              <label for="quantity">QTD</label>
              <input type="text" name="quantity" class="form-control" id="quantity" value="{{old('quantity')}}" required>
            </div>
            <div class="col-sm-3">
              <label for="um">U.M.</label>
              <select id="um" name="um" class="form-control">
                <option selected disabled>Selecione....</option>
                <option value="caixa">Caixa</option>
                <option value="fardo">Fardo</option>
                <option value="unidade">Unidade</option>
                <option value="pacote">Pacote</option>
              </select>
            </div>            
            <div class="col-sm-6" id="due_date">
              <label for="due_date">Data de Vencimento</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>                     
                  <input type="text" name="due_date" class="form-control pull-right input-date">
              </div>
              <div class="form-group">
                <input type="checkbox" id="no_due_batch" name="no_due_batch">
                <label for="no_due_batch">Sem Vencimento</label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Incluir</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--/.Incluir Item Lote-->


<!--Adicionar produto no pedido-->
<div class="modal fade" id="addOrderProduct">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{route('admin.order.product.store')}}">
        {{csrf_field()}}
        <input type="hidden" name="order_id">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Confirmação</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row" >
            <div class="col-sm-12">
              <label for="bar_code">Código de barras</label>
              <input type="text" name="bar_code" class="form-control" id="bar_code" readonly>
            </div>
          </div>
          <div class="form-group row" >
            <div class="col-sm-6">
              <label for="name">Nome</label>
              <input type="text" name="name" class="form-control" id="name" readonly>
            </div>
            <div class="col-sm-3">
              <label for="total">Qtd Estoque</label>
              <input type="text" name="total" class="form-control" id="total" readonly>
            </div>
            <div class="col-sm-3">
              <label for="quantity">Qtd Solicitada</label>
              <input type="text" name="quantity" class="form-control" id="quantity">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="sale_price">Preço de Venda</label>
              <input type="text" name="sale_price" class="form-control" id="sale_price" readonly>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" >Atualizar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--/.Adicionar produto no pedido-->


<!--Adicionar lote no pedido-->
<div class="modal fade" id="addOrderBatch">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{route('admin.order.batch.store')}}">
        {{csrf_field()}}
        <input type="hidden" name="order_id">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Confirmação</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row" >
            <div class="col-sm-12">
              <label for="batch_code">Código Lote</label>
              <input type="text" name="batch_code" class="form-control" id="batch_code" readonly>
            </div>
          </div>
          <div class="form-group row" >
            <div class="col-sm-12">
              <label for="name">Nome</label>
              <input type="text" name="name" class="form-control" id="name" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <label for="sale_price">Preço de Venda</label>
              <input type="text" name="sale_price" class="form-control" id="sale_price" readonly>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" >Confirmar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--/.Adicionar lote no pedido-->