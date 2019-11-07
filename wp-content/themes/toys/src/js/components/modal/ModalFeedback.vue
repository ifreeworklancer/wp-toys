<template>
    <div>
        <div class="custom-modal custom-modal--feedback" v-bind:class="{ active: activeModal }">
            <div class="close-modal" @click="showModal">
                <div class="line line--left"></div>
                <div class="line line--right"></div>
            </div>
            <div class="custom-modal-header">
                <h3 class="title">
                    Свяжитесь с нами
                </h3>
            </div>
            <div class="custom-modal-body">
                <ul class="contacts-list">
                    <li>
                        <a :href="`tel:${phoneLink}`">
                            <svg width="15" height="15">
                                <use xlink:href="#phone-icon"></use>
                            </svg>
                            {{phone}}
                        </a>
                    </li>
                </ul>
                <ul class="social-list">
                    <li>
                        <a :href="instagram">
                            <svg width="20" height="20">
                                <use xlink:href="#instagram-icon"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a :href="`viber://add?number=${viber}`">
                            <svg width="20" height="20">
                                <use xlink:href="#viber-icon"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a :href="`tg://resolve?domain=${telegram}`">
                            <svg width="20" height="20">
                                <use xlink:href="#telegram-icon"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal-mask" @click="showModal" v-bind:class="{ active: activeModal }"></div>
    </div>
</template>

<script>
    export default {
        props: {
            phone: String,
            phoneLink: String,
            instagram: String,
            viber: String,
            telegram: String,
        },
        computed: {
            activeModal() {
                return this.$store.state.activeModal;
            }
        },
        methods: {
            showModal() {
                this.$store.commit('showModal');
            }
        },
    }
</script>