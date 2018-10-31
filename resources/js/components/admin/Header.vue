<template>
    <div>
        <div class="header">
            <a @click="menuToggle" id="menu-toggle" class="">
                <i class="fa fa-bars"></i>
                <span>Menu</span>
            </a>
            <div class="logo">
                AdminLogo
            </div>
        </div>
        <div class="sidebar" :class="getSidebarClass()">
            <ul>
                <li><a href="#"><i class="fa fa-desktop"></i><span>Desktop</span></a></li>
                <li><a href="#"><i class="fa fa-server"></i><span>Server</span></a></li>
                <li><a href="#"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i><span>Messages</span></a></li>
                <li><a href="#"><i class="fa fa-table"></i><span>Data Table</span></a></li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
          return{
              isActive: false
          }
        },
        methods: {
            menuToggle() {
                this.isActive = !this.isActive
            },
            getSidebarClass() {
                return this.isActive? 'active':''
            },
        }
    }
</script>