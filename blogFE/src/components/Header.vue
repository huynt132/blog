<template>
  <div id="main__header">
    <b-navbar toggleable="lg" type="dark" variant="success">
      <!-- Just an image -->
      <b-navbar variant="faded" type="light">
        <b-navbar-brand href="#">
          <img id="app__logo" src="../assets/img/blog_logo.png" />
        </b-navbar-brand>
      </b-navbar>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item href="#">Front-end</b-nav-item>
          <b-nav-item href="#" disabled>Back-end</b-nav-item>
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-item-dropdown right>
            <!-- Using 'button-content' slot -->
            <template #button-content>
              <em>User</em>
            </template>
            <b-dropdown-item href="#">Profile</b-dropdown-item>
            <b-dropdown-item href="#">Sign Out</b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
export default {
  name: "Header",
};
</script>

<style scoped>
#main__header {
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1;
}
#app__logo {
  width: 50px;
}
</style>
