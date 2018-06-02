<template lang="html">
    <div class="">
        <div class="form-group">
            <select v-model="select_group" class="form-control">
                <option disabled>Selecione o grupo de aposta:</option>
                <option v-for="group in user_groups">
                    {{ group.name }}
                </option>
            </select>
        </div>
        <div v-if="ranking_group" class="ranking">
            <div class="ranking-item ranking-item-us">Apostador</div>
            <div class="ranking-item ranking-item-pt">Acertos</div>
            <div class="ranking-item ranking-item-pt">Quase</div>
            <div class="ranking-item ranking-item-pt"><b>Pontos</b></div>
        </div>
        <div v-for="rank in ranking_group" class="ranking color-blk">
            <div class="ranking-item ranking-item-us">{{ rank.user_name }}</div>
            <div class="ranking-item ranking-item-pt">{{ rank.hit_the_mark }}</div>
            <div class="ranking-item ranking-item-pt">{{ rank.almost_hit }}</div>
            <div class="ranking-item ranking-item-pt fntsz12"><b>{{ rank.total_score }}</b></div>
        </div>
    </div>
</template>

<script>
export default {
    props: [ "user_groups", "ranking" ],
    data () {
        return {
            select_group: '',
            ranking_group: null
        }
    },
    watch: {
        select_group: function () {
            this.ranking_group = this.ranking[ this.select_group ]
            return
        }
    }
}
</script>

<style lang="css">
</style>
