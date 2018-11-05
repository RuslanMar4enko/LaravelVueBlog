<template>
    <div>
        <div class="header">
            <a @click="menuToggle" id="menu-toggle" class="">
                <i class="fa fa-bars"></i>
                <span>Menu</span>
            </a>
            <router-link :to="{ name: 'AdminHome'}">
                <div class="logo">
                    AdminLogo
                </div>
            </router-link>
        </div>
        <div class="sidebar" :class="getSidebarClass()">
            <ul>
                <li>
                    <router-link :to="{ name: 'ArticlesPage'}"><i class="fa fa-newspaper-o"></i><span>News</span>
                    </router-link>
                </li>
                <li><router-link :to="{ name: 'CheckIn'}"><i class="fa fa-users"></i><span>New admin</span></router-link></li>
                <li><a><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
                <li><a><i class="fa fa-envelope-o"></i><span>Messages</span></a></li>
                <li><a @click="logout" ><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
            </ul>
        </div>
    </div>
</template>

<script>
    import * as types from '../../store/modules/auth/mutation-types';
    import api from '../../config/api'
    export default {
        data() {
            return {
                isActive: false
            }
        },
        methods: {
            menuToggle() {
                this.isActive = !this.isActive
            },
            getSidebarClass() {
                return this.isActive ? 'active' : ''
            },
            async logout() {
                try {
                    await api().get('logout')
                    localStorage.removeItem('token')
                    this.$store.commit(types.TOKEN, null)
                    this.$router.push({name: 'AdminLogin'});
                } catch (e) {
                    console.log(e);
                }

            }
        }
    }
</script>