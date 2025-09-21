# PATH Changes (old path → new path)

- djok_gung.jpg → d/djok_gung.jpg
- djok_man_gung_sawoey.jpg → d/djok_man_gung_sawoey.jpg
- djok_mhu_sap.jpg → d/djok_mhu_sap.jpg
- dok_gui_chai_pad_mhu.jpg → d/dok_gui_chai_pad_mhu.jpg
- hoi_pa_hu_pad_nam_prik_pao.jpg → h/hoi_pa_hu_pad_nam_prik_pao.jpg
- kanaa_nuea_pad_nam_man_hoi.jpg → k/kanaa_nuea_pad_nam_man_hoi.jpg
- kanaa_plaa_khem.jpg → k/kanaa_plaa_khem.jpg
- khaep_mhu.jpg → k/khaep_mhu.jpg
- khanom_bang-na_mhu_gung.jpg → k/khanom_bang-na_mhu_gung.jpg
- khanom_djib.jpg → k/khanom_djib.jpg
- khanom_pia.jpg → k/khanom_pia.jpg
- khao_lueang_up_gai.jpg → k/khao_lueang_up_gai.jpg
- khao_man_kati.jpg → k/khao_man_kati.jpg
- khao_mok_gai.jpg → k/khao_mok_gai.jpg
- khao_yam_ko_yo_durchmischt.jpg → k/khao_yam_ko_yo_durchmischt.jpg
- khao_yam_ko_yo.jpg → k/khao_yam_ko_yo.jpg
- khao_yam_pak_dai.jpg → k/khao_yam_pak_dai.jpg
- kor_moo_yang_jim_jeaw.jpg → k/kor_moo_yang_jim_jeaw.jpg
- kuai_tiao_khua_gai.jpg → k/kuai_tiao_khua_gai.jpg
- laap_gai.jpg → l/laap_gai.jpg
- laap_plaa.jpg → l/laap_plaa.jpg
- larb_hed_khem_thong.jpg → l/larb_hed_khem_thong.jpg
- lon_kapi.jpg → l/lon_kapi.jpg
- lon_man_gung_sawoey.jpg → l/lon_man_gung_sawoey.jpg
- ma_muang_nam_plaa_wan.jpg → m/ma_muang_nam_plaa_wan.jpg
- makuea_yao_pad_tao_djiau.jpg → m/makuea_yao_pad_tao_djiau.jpg
- mara_pad_khai.jpg → m/mara_pad_khai.jpg
- mhu_lung.jpg → m/mhu_lung.jpg
- mhu_pad_saam_sahai.jpg → m/mhu_pad_saam_sahai.jpg
- mhu_sap_pad_kapi_sai_dok_khae.jpg → m/mhu_sap_pad_kapi_sai_dok_khae.jpg
- mhu_wan.jpg → m/mhu_wan.jpg
- mie_grob_samun_prai.jpg → m/mie_grob_samun_prai.jpg
- moo_nam_man_hoi.jpg → m/moo_nam_man_hoi.jpg
- naem_thod_bai_makrut.jpg → n/naem_thod_bai_makrut.jpg
- nam_plaa_wan.jpg → n/nam_plaa_wan.jpg
- nam_prik_ma_muang.jpg → n/nam_prik_ma_muang.jpg
- nam_prik_na_rok.jpg → n/nam_prik_na_rok.jpg
- nam_prik_nam_pak.jpg → n/nam_prik_nam_pak.jpg
- nam_prik_sok_khai.jpg → n/nam_prik_sok_khai.jpg
- nam_yam.jpg → n/nam_yam.jpg
- pak_bung_yleng_nam_man_hoi.jpg → p/pak_bung_yleng_nam_man_hoi.jpg
- pak_khad_kaau_pad_gai.jpg → p/pak_khad_kaau_pad_gai.jpg
- pak_khad_kaau_pad_plaa_muek_haeng.jpg → p/pak_khad_kaau_pad_plaa_muek_haeng.jpg
- pak_khad_tao_hu_moo.jpg → p/pak_khad_tao_hu_moo.jpg
- phla_gung.jpg → p/phla_gung.jpg
- phla_plaa_muek_thod.jpg → p/phla_plaa_muek_thod.jpg
- plaa_ga_phong_pad_tao_djiau.jpg → p/plaa_ga_phong_pad_tao_djiau.jpg
- plaa_muek_nueng_manao.jpg → p/plaa_muek_nueng_manao.jpg
- plaa_muek_pad_nam_prik_pao.jpg → p/plaa_muek_pad_nam_prik_pao.jpg
- plaa_pad_khuen_chai.jpg → p/plaa_pad_khuen_chai.jpg
- plaa_pad_phed_prik_thai_on.jpg → p/plaa_pad_phed_prik_thai_on.jpg
- si_khrong_mhu_dtun_tao_djiau.jpg → s/si_khrong_mhu_dtun_tao_djiau.jpg
- si_khrong_mhu_dtun_tao_djiau2.jpg → s/si_khrong_mhu_dtun_tao_djiau2.jpg
- sup_hed_gra_dang.jpg → s/sup_hed_gra_dang.jpg
- tab_wan_von_passie.jpg → t/tab_wan_von_passie.jpg
- tao_hu_pad_thua_nog.jpg → t/tao_hu_pad_thua_nog.jpg
- thua_phu_pad_mhu.jpg → t/thua_phu_pad_mhu.jpg

## What was done

All image files in `media/_thaiindex/` root directory were moved to alphabetic subfolders based on their first letter. For example:
- Files starting with 'd' moved to `d/` subfolder
- Files starting with 'h' moved to `h/` subfolder
- Files starting with 'k' moved to `k/` subfolder
- etc.

## What you need to adjust

In your consuming project, update all image path references from:
```
media/_thaiindex/filename.jpg
```
to:
```
media/_thaiindex/{first-letter}/filename.jpg
```

You can use this helper function:
```javascript
function getNewThaiIndexPath(filename) {
    const firstLetter = filename.charAt(0).toLowerCase();
    return `media/_thaiindex/${firstLetter}/${filename}`;
}
```
