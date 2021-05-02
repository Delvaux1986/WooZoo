<template>
    <header>
      <div class="text-center">
        <h2 class="OldLondon">WooZoo</h2>
      </div>
      <nav class="navbar navbar-expand-lg w-100">
        <ol class="d-flex w-100 align-items-center justify-content-around">
          <li class="navbar-brand"><a :href="route('home')">Home</a></li>
          <li class="nav-item"><a :href="route('animals')">Animals</a></li>
          <li class="nav-item"><a :href="route('users')">Healers</a></li>
          <li class="nav-item"><a :href="route('enclosure')">Enclosures</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ $page.props.user.name }}
            </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" :href="route('profile.show')">Profil</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
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
import JetDropdown from '@/Jetstream/Dropdown'

export default {
    components: {
        JetDropdown
    }    
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