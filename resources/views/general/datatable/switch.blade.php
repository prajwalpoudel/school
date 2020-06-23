<span class="m-switch m-switch--outline m-switch--success">
    <label>
        <input type="checkbox" {{ $checked ? 'checked' : null }} name="{{ $name ?? null }}" {{ $disabled ? 'disabled' : null }} value="1" onchange="changeStatus(this.value)">
        <span></span>
    </label>
</span>

<script>
    function changeStatus(val) {
        // $.ajax({
        //     url : 'http://voicebunny.comeze.com/index.php',
        //     type : 'GET',
        //     data : {
        //         'numberOfWords' : 10
        //     },
        //     dataType:'json',
        //     success : function(data) {
        //         alert('Data: '+data);
        //     },
        //     error : function(request,error)
        //     {
        //         alert("Request: "+JSON.stringify(request));
        //     }
        // });
    }

</script>
