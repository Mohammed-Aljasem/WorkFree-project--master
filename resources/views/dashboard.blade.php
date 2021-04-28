
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>hello</h1>
                    <p>My name: {{Auth::user()->first_name}}</p>
                    <p>My Email: {{Auth::user()->email}}</p>
                    <img alt="{{Auth::user()->first_name}}" src="{{Auth::user()->image}}"/>
                </div>
            </div>
        </div>
    </div>

