<template> 

  <user-layout>

      <template #header>
        <h1 class="m-0"></h1>
      </template>

      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dollar-sign"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text fw-bold">Argent convertis</span>
                  <span class="info-box-number">0</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

                        <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-blueMe whiteimportant  elevation-1"><i class="fas fa-money-check-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text fw-bold">Carte(s)</span>
                  <span class="info-box-number">0</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-orangeMe whiteimportant elevation-1"><i class="far fa-clock"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text fw-bold">En attente(s)</span>
                  <span class="info-box-number">0</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-ban"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text fw-bold">Refusée(s)</span>
                  <span class="info-box-number">0</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
            

              <!-- TABLE: LATEST ORDERS -->
              <div class="card no-align-items">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Vos cartes</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>Email Paypal</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th>Montant</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>
                          <input class="form-control" type="text" value="claragmtt@gmail.com" aria-label="Disabled input example" disabled readonly>
                        </td>
                        <td>
                          <input class="form-control" type="text" value="0574-8475-8852-8485" aria-label="Disabled input example" disabled readonly>
                        </td>
                        <td><span class="badge badge-success mt-11-px">Shipped</span></td>
                        <td>
                          <div class="sparkbar mt-11-px" data-color="#00a65a" data-height="20">50€</div>
                        </td>
                      </tr>
                       <tr>
                        <td>
                          <input class="form-control" type="text" value="claragmtt@gmail.com" aria-label="Disabled input example" disabled readonly>
                        </td>
                        <td>
                          <input class="form-control" type="text" value="0574-8475-8852-8485" aria-label="Disabled input example" disabled readonly>
                        </td>
                        <td><span class="badge badge-success mt-11-px">Shipped</span></td>
                        <td>
                          <div class="sparkbar mt-11-px" data-color="#00a65a" data-height="20">50€</div>
                        </td>
                      </tr>
                       <tr>
                        <td>
                          <input class="form-control" type="text" value="claragmtt@gmail.com" aria-label="Disabled input example" disabled readonly>
                        </td>
                        <td>
                          <input class="form-control" type="text" value="0574-8475-8852-8485" aria-label="Disabled input example" disabled readonly>
                        </td>
                        <td><span class="badge badge-success mt-11-px">Shipped</span></td>
                        <td>
                          <div class="sparkbar mt-11-px" data-color="#00a65a" data-height="20">50€</div>
                        </td>
                      </tr>
                                             <tr>
                        <td>
                          <input class="form-control" type="text" value="claragmtt@gmail.com" aria-label="Disabled input example" disabled readonly>
                        </td>
                        <td>
                          <input class="form-control" type="text" value="0574-8475-8852-8485" aria-label="Disabled input example" disabled readonly>
                        </td>
                        <td><span class="badge badge-success mt-11-px">Shipped</span></td>
                        <td>
                          <div class="sparkbar mt-11-px" data-color="#00a65a" data-height="20">50€</div>
                        </td>
                      </tr>
                                             <tr>
                        <td>
                          <input class="form-control" type="text" value="claragmtt@gmail.com" aria-label="Disabled input example" disabled readonly>
                        </td>
                        <td>
                          <input class="form-control" type="text" value="0574-8475-8852-8485" aria-label="Disabled input example" disabled readonly>
                        </td>
                        <td><span class="badge badge-success mt-11-px">Shipped</span></td>
                        <td>
                          <div class="sparkbar mt-11-px" data-color="#00a65a" data-height="20">50€</div>
                        </td>
                      </tr>
                    
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!--/. container-fluid -->
      </section>
  </user-layout>
</template>

<script>
import UserLayout from '@/Layouts/UserLayout'
    export default {
      components: { UserLayout },

    }
</script>
