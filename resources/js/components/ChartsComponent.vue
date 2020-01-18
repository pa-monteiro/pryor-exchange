<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>      
    </div>
    <div class="row">
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total de Pedidos</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ orders.orders.length }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total de Pedidos/Dia</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ orders.total_pedido_dia }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pedidos Pendentes</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ orders.pendentes }}</div>
                  </div>                  
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card shadow mb-4">

    <div class="card-body">    
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Código pedido</th>
              <th>Código cliente</th>
              <th>Moeda</th>
              <th>Pagamento</th>
              <th>Valor da Moeda Estrangeira</th>
              <th>Valor da Moeda Nacional</th>
              <th>Valor da Taxa</th>
              <th>Status</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
              <tr v-for="order in orders.orders" v-bind:key="order.id">
                <td>{{ order.idBoleto }}</td>
                <td>{{ order.cdCliente }}</td>                
                <td>{{ order.cdCliente }}</td>                
                <td>{{ order.cdProduto }}</td>                
                <td>R$ {{ formatPrice(order.valorMe) }}</td>                
                <td>R$ {{ formatPrice(order.valorMn) }}</td>                
                <td>R$ {{ formatPrice(order.valorTaxa) }}</td>                
                <td>{{ order.idStatus }}</td>                
                <td>{{ order.dtVenda }}</td>    
                <td>
                  <a :href="`orders/${order.idBoleto}`" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                    Detalhes
                  </a>
                </td>  
              </tr>
             
          </tbody>
        </table>

      </div>
    </div>
  </div>
  </div>
</div>
</template>

<script>
    export default {
        data() {
          return { 
            orders: []
            }
        },
        created() {
            this.fetchOrders();
            this.interval = setInterval(function () {
          this.fetchOrders();
        }.bind(this), 10000);

        },

        methods: {
          async fetchOrders() {
            await axios.get('pedidos').then(response => {
              this.orders = response.data;    
            }).bind(this);
            },
          formatPrice(value) {
            let val = (value/1).toFixed(2).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
          },                     
        }
    }
</script>