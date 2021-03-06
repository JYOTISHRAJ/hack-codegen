<?hh // strict
/*
 *  Copyright (c) 2015-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace Facebook\HackCodegen\_Private;

use type Facebook\HackCodegen\{IHackBuilderValueRenderer, IHackCodegenConfig};

use namespace HH\Lib\{Str, Regex};

final class HackBuilderRegexRenderer<T>
  implements IHackBuilderValueRenderer<Regex\Pattern<T>> {

  final public function render(
    IHackCodegenConfig $_,
    Regex\Pattern<T> $value,
  ): string {
    return 're"'.
      Str\replace_every(
        (string) $value,
        dict[
          '$' => '\\$',
          '"' => '\\"',
        ],
      ).
      '"';
  }
}
