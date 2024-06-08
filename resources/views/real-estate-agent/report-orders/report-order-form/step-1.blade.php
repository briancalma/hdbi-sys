@extends('layouts.app')

@section('title', 'Order New Report')

@section('content')
<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark flex flex-row items-center justify-between">
        <h3 class="font-medium text-black dark:text-white">
            Step 1: Address Information
        </h3>

        <button         
            onclick="event.preventDefault(); document.querySelector('#address-form').submit();"
            class="inline-flex items-center justify-center gap-2.5 rounded-md bg-meta-3 px-10 py-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
            Proceed to Step 2
        </button>
    </div>

    <form method="POST" action="{{ route('real-estate-agent.report-orders.store.step-1') }}" x-data="{ type: 'string' }" id="address-form">
        @csrf
        <div class="p-6.5">
            <div class="form-group" id="map-container">
            </div>
        </div>
        <div class="mb-5 flex flex-col gap-6 xl:flex-row">
            <div id="map" style="height: 600px; width: 100%;"></div> 
        </div>

        <input type="hidden" name="address" id="selected-position">
    </form>
</div>
@endsection

@section('scripts')    
<!-- prettier-ignore -->
<script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
({key: "{{ env('GOOGLE_MAPS_API_KEY') }}", v: "beta"});</script>

<script>
    let map;
    let marker;

    async function initMap() {
        const position = { lat: -33.865143, lng: 151.209900 };
        
        //@ts-ignore
        const { Map } = await google.maps.importLibrary("maps");
        const { Marker, AdvancedMarkerElement, PinElement } = await google.maps.importLibrary("marker");
        const { Place } = await google.maps.importLibrary("places");
        
        map = new Map(document.getElementById("map"), {
            zoom: 20,
            center: position,
            mapId: "HDBI_SYSTEM_MAP",
        });

        marker = new AdvancedMarkerElement({
            map: map,
            position,
            draggable: true,
            title: 'Selected Location'
        });

        map.addListener("click", (e) => placeMarkerAndPanTo(e.latLng, map));

        setupPlacesAutoCompleteInput();
    }

    function setupPlacesAutoCompleteInput()
    {
        //@ts-ignore
        const placeAutocomplete = new google.maps.places.PlaceAutocompleteElement();

        placeAutocomplete.addEventListener("gmp-placeselect", async ({ place }) => {

            await place.fetchFields({
                fields: ["displayName", "formattedAddress", "location"],
            });

            const {location} = place.toJSON();

            placeMarkerAndPanTo(location, map);
        });

        document.getElementById("map-container").appendChild(placeAutocomplete);
    }

    function placeMarkerAndPanTo(latLng, map) {
        document.getElementById('selected-position').value = JSON.stringify(latLng);
        marker.position = latLng;
        map.panTo(latLng);
    }

    initMap();
</script>
@endsection