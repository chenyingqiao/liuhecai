<canvas id="{{$name}}" width="300" height="300"></canvas>
<script>

$(function () {
   var ctx = document.getElementById("{{$name}}").getContext('2d');
   var {{$name}} = new Chart(ctx, {
       type: 'bar',
       data: {
           labels: [
            @foreach ($labels as $element)
              "{{$element}}",
            @endforeach
           ],
           datasets: [{
               label: '{{$msg}}',
               data: [
                @foreach ($data as $element)
                  {{$element}},
                @endforeach
               ],
               backgroundColor: [
                    @foreach ($color as $element)
                     'rgba({{$element}}, 0.5)',
                    @endforeach
               ],
               borderColor: [
                    @foreach ($color as $element)
                     'rgba({{$element}}, 1)',
                    @endforeach
               ],
               borderWidth: 1
           }]
       },
       options: {
           scales: {
               yAxes: [{
                   ticks: {
                       beginAtZero:true
                   }
               }]
           }
       }
   });
});
</script>