<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card flex-row my-5">
                    <div class="card-body">
                        <div class="flex-center position-ref full-height" id="api-doc">
                            <div class="title m-b-md">
                                API of Cloudou Project
                            </div>

                            <div class="links">
                                <a target="blank" href="https://docs.google.com/document/d/1sLxJIenmjKI33VCF0J8fFB2C1JdDeSl9_Wy4B8oErPk/edit?usp=sharing">Documentation</a>
                                <a target="blank" href="https://discord.gg/dU4jU9S">Discord</a>
                                <a target="blank" href="https://github.com/antoineFrau/semi-croustillants">GitHub</a>
                                <a target="blank" href="https://trello.com/invite/b/Y8llwvL0/e137675a8a1560dbd33153efcfcc3ec4/ria-project">Trello</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style lang="scss">
    #api-doc {
        text-align: center;
        font-weight: 100;
        margin: 0;
        padding-bottom: 1em;
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .title {
            font-size: 84px;
        }
        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
    }
</style>
