<template>
    <header>
      <nav class="navbar navbar-expand-lg w-100">
        <ol class="d-flex w-100 align-items-center justify-content-around">
          <a :href="route('home')">
              <img :src="`${logo}`" alt="logo" class="img-fluid" style="width: 100px; height: 100px;">
            </a>
          <li class="nav-item h3 fw-bold"><a :href="route('animals')">Animals</a></li>
          <li class="nav-item h3 fw-bold"><a :href="route('users')">Healers</a></li>
          <li class="nav-item h3 fw-bold"><a :href="route('enclosure')">Enclosures</a></li>
          <li class="nav-item dropdown h3 fw-bold">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ $page.props.user.name }}
            </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" :href="route('profile.show')">Profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" :href="route('logout')">Logout</a></li>
              </ul>
          </li>
        </ol>
      </nav>
      <div id="banner" ref="banner">
        <p>
          {{ messagePromo }}
        </p>
      </div>
    </header>
    <main>
        <slot></slot>
    </main>
</template>

<script>


export default {
    components: {
        
    },
    mounted(){
      // console.log(this.$page);
    },
    data() {
      return {
        logo : "./assets/img/logo.png",
      }
    },
    

}
</script>

<style scoped>
    header
        {
        background-color: #bacf9f;
        color:#52351e !important;
        }
    nav > ol > li > a {
        text-decoration: none;
        }
    a {
        color:#52351e !important;
        }
    ol {
        list-style-type: none;
        
        }
    
</style>