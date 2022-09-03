<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img style="border-radius:50%; width:40px; height:40px;" src="{{asset('user_photo/'.auth()->user()->getLoggedInUserLogo())}}"  alt="user-img" class="img-circle"><span class="hide-menu">{{auth()->user()->name}}</span></a>
                </li>
                @if(in_array('Can view Dashboard', auth()->user()->getUserPermisions()))
                <li> <a class="waves-effect waves-dark" href="/dashboard" aria-expanded="false"><i class="ti-home"></i><span class="hide-menu">Dashboard</span></a></li>
                @endif
                @if(in_array('Can view Reception', auth()->user()->getUserPermisions()))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Inquiries</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a class="waves-effect waves-dark" href="/recieptionmodule/all-domestic-workers"><span class="hide-menu"> All Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/recieptionmodule/new-domestic-workers"><span class="hide-menu"> New Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/recieptionmodule/trash"><span class="hide-menu"> Trashed Workers</span></a>
                        </li>
                     </ul>
                 </li>
                @endif
                @if(in_array('Can view Premedical', auth()->user()->getUserPermisions()))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-move"></i><span class="hide-menu"> Premedical</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a class="waves-effect waves-dark" href="/premedicalmodule/"><span class="hide-menu"> All Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/premedicalmodule/domestic-workers-with-premedical"><span class="hide-menu"> Successful Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/premedicalmodule/domestic-workers-without-premedical"><span class="hide-menu"> Pending Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/premedicalmodule/trash"><span class="hide-menu"> Trashed Workers</span></a>
                        </li>
                        {{--<li class="nav-small-cap" style="text-transform:uppercase;">Gulf Cooperation Council (GCC)</li>--}}
                        <li> <a class="waves-effect waves-dark" href="https://v2.gcchmc.org/book-appointment/" target="_blank"><span class="hide-menu"> GCC</span></a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(in_array('Can view Registration', auth()->user()->getUserPermisions()))
                 <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-book"></i><span class="hide-menu"> Registration</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a class="waves-effect waves-dark" href="/registramodule/"><span class="hide-menu"> All Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/registramodule/new-domestic-workers"><span class="hide-menu"> Successful Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/registramodule/domestic-workers-without-registration"><span class="hide-menu"> Pending Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/registramodule/trashed-members"><span class="hide-menu"> Trashed Workers</span></a>
                        </li>
                     </ul>
                </li>
                @endif
                @if(in_array('Can view IT', auth()->user()->getUserPermisions()))
                 <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-support"></i><span class="hide-menu"> IT</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a class="waves-effect waves-dark" href="https://tawtheeq.musaned.com.sa" target="_blank"><span class="hide-menu"> Musaned</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="https://enjazit.com.sa/Enjaz/OrganizationServices" target="_blank"><span class="hide-menu"> Enjaz</span></a>
                        </li>
                     </ul>
                </li>
                @endif
                
                @if(in_array('Can view Passport', auth()->user()->getUserPermisions()))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-world"></i><span class="hide-menu"> Passport</span></a>
                    <ul aria-expanded="false" class="collapse">
                        
                        <li class="nav-small-cap">IMMIGRATION</li>
                        <li> <a class="waves-effect waves-dark" href="/passportmodule/dws-to-process-passport"><span class="hide-menu"> Process Passport</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/passportmodule/dws-passports-under-processing"><span class="hide-menu"> On Process</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/passportmodule/received-passports"><span class="hide-menu"> Received Passport</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/passportmodule/passports-not-received"><span class="hide-menu">  Not Received</span></a>
                        </li>
                        <li class="nav-small-cap">PASSPORT OFFICER</li>
                        <li> <a class="waves-effect waves-dark" href="/passportmodule/"><span class="hide-menu"> All Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/passportmodule/domestic-workers-with-passport"><span class="hide-menu"> Successful Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/passportmodule/domestic-workers-without-passport"><span class="hide-menu"> Pending Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/passportmodule/trashed-members"><span class="hide-menu"> Trashed Workers</span></a>
                        </li>
                        
                    </ul>
                </li>
                @endif
                @if(in_array('Can view CV', auth()->user()->getUserPermisions()))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-file"></i><span class="hide-menu">View CV</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a class="waves-effect waves-dark" href="/cv/all-dws"><span class="hide-menu"> Workers With CV</span></a>
                        </li>
                        {{--<li> <a class="waves-effect waves-dark" href="/cv/domestic-workers-with-CV"><span class="hide-menu"> Successful Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/cv/domestic-workers-without-CV"><span class="hide-menu"> Pending Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/cv/trash"><span class="hide-menu"> Trash</span></a>
                        </li>--}}
                    </ul>
                </li>
                @endif
                @if(in_array('Can view Training', auth()->user()->getUserPermisions()))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-pencil"></i><span class="hide-menu"> Training</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a class="waves-effect waves-dark" href="/trainingmodule/"><span class="hide-menu"> All Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/trainingmodule/training-schools"><span class="hide-menu"> Training Schools</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/trainingmodule/workers-for-training-schools"><span class="hide-menu"> Allocate Training Centers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/trainingmodule/workers-and-training-schools"><span class="hide-menu"> Workers & Centers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/trainingmodule/domestic-workers-with-training"><span class="hide-menu"> Successfull Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/trainingmodule/domestic-workers-without-training"><span class="hide-menu"> Pending Workers</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/trainingmodule/trash"><span class="hide-menu"> Trashed Workers</span></a>
                        </li>
                    </ul>
                </li>
                @endif
                {{--@if(in_array('Can view Clearance', auth()->user()->getUserPermisions()))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-check-box"></i><span class="hide-menu"> Clearance</span></a>
                    <ul aria-expanded="false" class="collapse">
                            <li> <a class="waves-effect waves-dark" href="/clearancemodule/"><span class="hide-menu"> All Workers</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/clearancemodule/domestic-workers-cleared"><span class="hide-menu"> Successful Workers</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/clearancemodule/domestic-workers-with-pending-clearance"><span class="hide-menu"> Pending Workers</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/clearancemodule/trash"><span class="hide-menu"> Trashed Workers</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/clearancemodule/profile"><span class="hide-menu"> Profile</span></a>
                            </li>
                    </ul>
                </li>
                @endif
                --}}
                @if(in_array('Can View Documents', auth()->user()->getUserPermisions()))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layers"></i><span class="hide-menu"> Documents</span></a>
                    <ul aria-expanded="false" class="collapse">
                            <li> <a class="waves-effect waves-dark" href="/otherreports/all-domestic-workers"><span class="hide-menu"> All Workers</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/otherreports/successful-dw"><span class="hide-menu"> Successful Workers</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/otherreports/domestic-workers-pending-documents"><span class="hide-menu"> Pending Workers</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/otherreports/trash"><span class="hide-menu"> Trashed Workers</span></a>
                            </li>
                            
                    </ul>
                </li>
                @endif
                @if(in_array('Can View Dw Overall Status', auth()->user()->getUserPermisions()))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-dropbox"></i><span class="hide-menu"> Workers Status</span></a>
                    <ul aria-expanded="false" class="collapse">
                            <li> <a class="waves-effect waves-dark" href="/domesticworkeroverallstatus/all-workers-information"><span class="hide-menu"> All Workers Info</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/domesticworkeroverallstatus/"><span class="hide-menu"> Allocate Employer</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/domesticworkeroverallstatus/get-dw-employer"><span class="hide-menu"> Workers Employer</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/domesticworkeroverallstatus/companies"><span class="hide-menu"> Travelled</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/domesticworkeroverallstatus/returned"><span class="hide-menu"> Returned</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/domesticworkeroverallstatus/renewed"><span class="hide-menu"> Contract Renewed</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/domesticworkeroverallstatus/did-not-travel"><span class="hide-menu"> Did Not Travel</span></a>
                            </li>
                    </ul>
                </li>
                @endif
                @if(in_array('Can view Agent', auth()->user()->getUserPermisions()))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-hand-point-right"></i><span class="hide-menu"> Agent</span></a>
                    <ul aria-expanded="false" class="collapse">
                            <li> <a class="waves-effect waves-dark" href="/companyagents/company-agents"><span class="hide-menu"> Agent</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/companyagents/trashed-agents"><span class="hide-menu"> Trash</span></a>
                            </li>
                    </ul>
                </li>
                @endif
                @if(in_array('Can view account settings', auth()->user()->getUserPermisions()))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu"> Account Settings</span></a>
                    <ul aria-expanded="false" class="collapse">
                       <li> <a class="waves-effect waves-dark" href="/get-users" aria-expanded="false"><span class="hide-menu"> Permissions</span></a></li>
                       <li> <a class="waves-effect waves-dark" href="/register-user" aria-expanded="false"><span class="hide-menu"> Register User</span></a></li>
                       <li> <a class="waves-effect waves-dark" href="/registered-users" aria-expanded="false"><span class="hide-menu"> Users</span></a></li>
                    </ul>
                </li>
                @endif
                @if(in_array('Can view job orders', auth()->user()->getUserPermisions()))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid4"></i><span class="hide-menu"> Job Order</span></a>
                    <ul aria-expanded="false" class="collapse">
                       <li> <a class="waves-effect waves-dark" href="/abroadcompany/" aria-expanded="false"><span class="hide-menu">Companies Abroad</span></a></li>
                       <li> <a class="waves-effect waves-dark" href="/abroadcompany/trash" aria-expanded="false"><span class="hide-menu">Trash Companies</span></a></li>
                       <li> <a class="waves-effect waves-dark" href="/joborder/" aria-expanded="false"><span class="hide-menu">Job Orders</span></a></li>
                       <li> <a class="waves-effect waves-dark" href="/joborder/trash" aria-expanded="false"><span class="hide-menu">Trashed Job Orders</span></a></li>
                    </ul>
                </li>
                @endif
                <li> <a class="waves-effect waves-dark" href="/profile" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">My Profile</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Side_bar scroll-->
</aside>
