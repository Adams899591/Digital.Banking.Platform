@if(Auth::user()->bankAccount->status === "Active")
        <span class="px-2 py-0.5 rounded-full bg-green-100 text-green-700 text-[10px] font-bold uppercase tracking-wider">{{Auth::user()->bankAccount->status}}</span>
@elseif(Auth::user()->bankAccount->status === "Suspended")
        <span class="px-2 py-0.5 rounded-full bg-green-100 text-yellow-700 text-[10px] font-bold uppercase tracking-wider">{{Auth::user()->bankAccount->status}}</span>
@elseif(Auth::user()->bankAccount->status === "Closed")
        <span class="px-2 py-0.5 rounded-full bg-green-100 text-red-700 text-[10px] font-bold uppercase tracking-wider">{{Auth::user()->bankAccount->status}}</span>
@endif