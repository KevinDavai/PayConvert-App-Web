<template> 

  <user-layout>

      <template #header>
        <h1 class="m-0"></h1>
      </template>

      <div class="container px-4">
        <div class="row gx-5">
          <div class="col">
            <form class="form-floating">
            <input type="email" class="form-control form-control-lg" id="floatingInputValue" placeholder="name@example.com" :value="`${ $page.props.user.email }`" disabled="">
              <label for="floatingInputValue">Adresse Email</label>
            </form>
          </div>
            <div class="col-2"> 
              <div class="btn-group" role="group" aria-label="Third group">
                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#pseudoModal">
                  <i class="fas fa-pen"></i>
                </button>
             </div>
            </div>
         
          <div class="col">
            <form class="form-floating">
              <input type="email" class="form-control form-control-lg" id="floatingInputValue" placeholder="name@example.com" :value="`${ $page.props.user.email }`" disabled="">
              <label for="floatingInputValue">Adresse Email</label>
            </form>
          </div>
            <div class="col-2">
              <div class="btn-group" role="group" aria-label="Third group">
                <button type="button" class="btn btn-secondary btn-edit" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-pen"></i></button>
              </div>
            </div>
        </div>
      </div>


<!-- Modal -->
<div class="modal fade" id="pseudoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  </user-layout>

</template>

<script>
import UserLayout from '@/Layouts/UserLayout'
    export default {
      components: { UserLayout }

    }


</script>
