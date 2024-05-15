@props(['title' => '', 'data' => [], 'height' => '450', 'fontSize' => '18'])
<div
    x-data="{
        title: @js($title),
        data: @js($data),
        height: @js($height),
        fontSize: @js($fontSize),
        init() {
            let chart = new ApexCharts(this.$refs.chart, this.options)

            chart.render()

            this.$watch('values', () => {
                chart.updateOptions(this.options)
            })
        },
        get options() {
            return {
                chart: { type: 'bar', height: this.height+'px'},
                xaxis: { categories: [''] },
                series: JSON.parse(this.data),
                title: {
                    text: this.title,
                    align: 'center',
                    style: {
                        color: undefined,
                        fontSize: this.fontSize+'px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 400,
                        cssClass: 'apexcharts-xaxis-title',
                        barWidth: 10
                    },
                },
            }
        }
    }"
    {{$attributes->merge(['class' => 'w-full'])}}
>
    <div x-ref="chart" class="rounded-lg bg-white p-8"></div>
</div>
