<template>
    <header>
      <div class="text-center">
        <h2 class="OldLondon">WooZoo</h2>
      </div>
      <nav>
        <ol>
          <li><a :href="route('home')">Home</a></li>
          <li><a :href="route('animals')">Animals</a></li>
          <li><a :href="route('users')">Healers</a></li>
          <li><a :href="route('enclosure')">Enclosures</a></li>
          <li>
              {{ $page.props.user.name }} faire un menu dropdown
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
    nav {
        border-top: 2px solid black;
        border-bottom: 2px solid black;
        padding: 0.45vh;
        margin-right: 40px;
        margin-left: 40px;
        }
    nav > ol > li > a {
        text-decoration: none;
        font-family: Pathway;
        font-size: var(--text-size);
        }
    a {
        color: black;
        }
    ol {
        list-style-type: none;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        }
</style>