<template> 

  <user-layout>

      <template #header>
        <h1 class="m-0"></h1>
      </template>

      <div class="container px-4">
        <div class="row gx-5">
          
          <div class="col">
            <form class="form-floating">
              <input type="email" class="form-control form-control-lg" id="floatingInputValue" placeholder="name@example.com" :value="`${ $page.props.user.name }`" disabled="">
              <label for="floatingInputValue">Nom D'utilisateur</label>
            </form>
          </div>  
                      <div class="col-2">
              <div class="btn-group" role="group" aria-label="Third group">
                <button type="button" class="btn btn-secondary btn-edit" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-pen"></i></button>
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
                <button type="button" class="btn btn-secondary btn-edit" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-pen"></i></button>
              </div>
            </div>
        </div>
      </div>
      
  </user-layout>
</template>

<script>
import UserLayout from '@/Layouts/UserLayout'
    export default {
      components: { UserLayout },

    }
</script>
