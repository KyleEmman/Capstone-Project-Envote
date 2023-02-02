<x-default :heading="$heading">

        <!-- background cover up to nav -->
        <section style = "background-image: url('{{asset('assets/img/Campus.jpg')}}')"
        class = "bg-darkGreenBPC w-full h-[300px] bg-cover bg-center bg-no-repeat relative pt-[200px]">
            <div class = "absolute w-full h-full bg-darkGreenBPC/[0.95] z-10 top-0">
            </div>
            <div class = "w-full z-20 text-white flex justify-center relative">
                <h2 class = "text-white text-3xl font-medium">Ongoing Election</h2>
            </div>
        </section>

        <section class="w-full flex flex-wrap gap-2 bg-white" id = "results">
            <div class = "w-full h-full flex items-center justify-center">
                loading...
            </div>
        </section>

        {{-- modal --}}
        <div id="profileModal" class="bg-black/25 fixed top-0 left-0 bottom-0 right-0 z-50 flex justify-center items-center hidden">
        </div>
        

<script type="module">
var res = ""
function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
      if (res != this.response) {
          document.getElementById("results").innerHTML = this.responseText;
      }
    res = this.response
    setTimeout(loadDoc, 5000);
    }
  xhttp.open("GET", "{{URL('/ongoing/results')}}", true);
  xhttp.send();
}
loadDoc();

</script>
<script>
    function showProfileModal(CID){
        document.querySelector("#profileModal").classList.remove('hidden');
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("profileModal").innerHTML = this.responseText;
        }
        xhttp.open("GET", "{{URL('/ongoing/showCandidateProfile')}}/" + CID, true);
        xhttp.send();
    }
    function closeModalProfile(){
        modal = document.querySelector('#profileModal');
        modal.firstChild.remove();
        modal.classList.add('hidden');
    }
    
</script>
</x-default>