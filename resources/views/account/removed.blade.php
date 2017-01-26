@extends('layouts.app')

@section('title', 'Activate account')

@section('sidebar')
    @parent

@endsection

@section('content')
    <table
            style="width: 90%; margin: 0 auto; background-color: #FFF; border: 1px solid #333"
            cellspacing="0" cellpadding="0" class="mceItemTable">
        <tbody>
        <tr style="height: 20px;">
            <td colspan="4" style="height: 20px;">&nbsp;</td>
        </tr>
        <tr style="height: 8px;">
            <td style="height: 8px; width: 20px;">&nbsp;</td>

            <td style="height:8px; padding:10px 20px; width:280px; border-bottom:1px solid #d9d9d9;"><img border="0" width=425 height=200 src="http://cms.eataly.net/itit/wp-content/uploads/sites/6/2016/10/eataly-wine-festival-slider.jpg" width="237"></td>

            <td style="height: 8px; width: 20px;">&nbsp;</td>
        </tr>

        <tr>
            <td style="width: 20px;" mce_style=" width:20px;"></td>
            <td colspan="2"
                style="height: 150px; padding: 50px 20px 20px 20px; border-top: 2px solid #f2f2f2;">
                <p resultCode="null">Il tuo account è stato cancellato.</p>
            </td>
            <td style="width: 20px;" mce_style=" width:20px;">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4"
                style="background-color: #f2f2f2; border-top: 1px solid #d9d9d9; padding: 20px 20px;; font-size: 10px;"
                mce_style="background-color:#f2f2f2; border-top:1px solid #d9d9d9; padding:20px 20px; ; font-size:10px;">
                &nbsp;</td>
        </tr>
        </tbody>
    </table>
@endsection