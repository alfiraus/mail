<body>
    <!-- HEADER -->
    <table style="width:100%; background-color: #F5F8FA; box-sizing: border-box; padding: 25px; font-size: 12px; padding-bottom: 35px;">
        <tr>
        <td></td>
            <td align="middle">                    
            <!-- content -->
                <table>
                    <tr>
                        <td>
                        <center>
                            <img src="{{ asset('img/email/italk_logo_email.png') }}" style="width: 100px;" />
                        </center>
                        </td>
                    </tr>
                </table>
            <!-- /content -->                     
            </td>
        <td></td>
        </tr>
    </table>
    <!-- /HEADER -->

    <!-- BODY -->
    <table style="width: 100%">
            @yield('content')
    </table>
    <!-- /BODY -->

    <!-- FOOTER -->
    <table style="width:100%; background-color: #F5F8FA; box-sizing: border-box; padding: 25px; font-size: 12px; padding-bottom: 35px;">
        <tr>
        <td></td>
            <td align="middle">                    
            <!-- content -->
                <table>
                    <tr>
                        <td>
                            © {{ now()->year }} iTalk. All rights reserved.
                        </td>
                    </tr>
                </table>
                <!-- /content -->                     
            </td>
        <td></td>
        </tr>
    </table>
    <!-- /FOOTER -->

</body>