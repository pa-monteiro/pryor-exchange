<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
            </tr>
          </thead>
          <tbody>
              <tr v-for="order in orders.orders" v-bind:key="order.id">
                <td>{{ order.idboleto }}</td>
                <td>{{ order.cdCliente }}</td>                
                <td>-</td>                
                <td>-</td>                
                <td>{{ order.valorMe }}</td>                
                <td>{{ order.valorMn }}</td>                
                <td>{{ order.valorTaxa }}</td>                
                <td>{{ order.dsStatus }}</td>                
                <td>{{ order.dtVenda }}</td>                
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
           
        }
    }
    
    
</script>