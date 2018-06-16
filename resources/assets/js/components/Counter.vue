<template lang="html">
    <div class="datetime">
        <span>{{ datetime }}</span>
    </div>
</template>

<script>
export default {
    props: [ 'matchdate' ],
    name: "counter",
    data () {
        return {
            datetime: '',
            targetDate: new Date(this.matchdate.year, this.matchdate.month, this.matchdate.date, this.matchdate.hour-2, this.matchdate.minute).getTime()
        }
    },
    created: function () {
        var self = this
        var dias = 0
        var horas = 0
        var minutos = 0
        var segundos = 0

        setInterval(function () {
            var currentCase = new Date().getTime()
            var segundoF = (self.targetDate - currentCase) / 1000

            dias = parseInt(segundoF / 86400) - 30
            if ( dias >= 0 ) {
                dias = dias > 0 ? dias + ' d e ' : ''

                segundoF = segundoF % 86400
                horas = parseInt(segundoF / 3600)

                segundoF = segundoF % 3600
                minutos = parseInt(segundoF / 60)
                segundos = parseInt(segundoF % 60)

                self.datetime = dias + ('00' + horas).slice(-2) + ':' + ('00' + minutos).slice(-2) + ':' + ('00' + segundos).slice(-2)
            }
            else {
                self.datetime = 'Aposta enc.'
            }
        }, 1000)
    }
}
</script>

<style lang="css">
.datetime {
    position: absolute;
    padding: 0 1em;
    text-align: left;
    color: red;
    font-weight: bold;
}
</style>
